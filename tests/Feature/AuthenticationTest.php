<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Accesslog;

class AuthenticationTest extends TestCase
{
    /**
     * Check Authentication without SIP provided
     * API request both SIP and RFID card number expected false
     *
     * @return void
     */
    public function testSIPANDRFIDNotProvided()
    {
        $this->get('api/authentication')
        ->assertStatus(200)
        ->assertExactJson([
            "access" => false
        ]);
    }

    /**
     * Check Authentication with SIP provided
     * API request both SIP and RFID card number expected false
     *
     * @return void
     */
    public function testSIPProvided()
    {
        $this->get('api/authentication?sip=' . 'q5shqv3r7bptsuzs6cincoif6esrt3r9')
        ->assertStatus(200)
        ->assertExactJson([
            "access" => false
        ]);
    }

    /**
     * Check Authentication with correct SIP and RFID card number
     * Emily James can access The Isaac Newton building expected true
     *
     * @return void
     */
    public function testCorrectUserCanToBuilding()
    {
        $log = Accesslog::orderBy('id', 'DESC')->first();
        if ($log) {
            $log->created_at = date("Y-m-d H:i:s", strtotime("-15 minutes"));
            $log->save();
        }
        $this->get('api/authentication?sip=81.10.230.31&cn=q5shqv3r7bptsuzs6cincoif6esrt3r9')
        ->assertStatus(200)
        ->assertExactJson([
            "access" => true
        ]);
    }

    /**
     * Check Authentication with correct SIP and RFID card number
     * Emily James can not access The Oscar Wilde building with no permission expected false
     *
     * @return void
     */
    public function testCorrectUserCanNotauthentication()
    {
        $this->get('api/authentication?sip=29.10.109.38&cn=q5shqv3r7bptsuzs6cincoif6esrt3r9')
        ->assertStatus(200)
        ->assertExactJson([
            "access" => false
        ]);
    }

    /**
     * Check Authentication with correct SIP and RFID card number
     * Emily James can not access The Charles Darwin within 10 min expected false
     *
     * @return void
     */
    public function testCorrectUserCanNotauthenticationWithin10Min()
    {
        $this->get('api/authentication?sip=12.32.231.56&cn=q5shqv3r7bptsuzs6cincoif6esrt3r9')
        ->assertStatus(200)
        ->assertExactJson([
            "access" => false
        ]);
    }

    /**
     * Check Authentication with correct SIP and RFID card number
     * Emily James can access The Charles Darwin after 10 min
     * Modify log data through 15 minutes then expect true
     *
     * @return void
     */
    public function testCorrectUserCanNotauthenticationAfter10Min()
    {
        $log = Accesslog::orderBy('id', 'DESC')->first();
        $log->created_at = date("Y-m-d H:i:s", strtotime("-15 minutes"));
        $log->save();
        $this->get('api/authentication?sip=12.1.214.1&cn=q5shqv3r7bptsuzs6cincoif6esrt3r9')
        ->assertStatus(200)
        ->assertExactJson([
            "access" => true
        ]);
    }
}
