<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CardHolderInfoTest extends TestCase
{
    /**
     * A Basic check on get card holder info with no RFOD field
     *
     * @return void
     */
    public function testRFIDNotProvided()
    {
        $this->get('api/getCardHolderInfo')
        ->assertStatus(200)
        ->assertExactJson([[
            "full_name" => "",
            "department" => []
        ]]);
    }

    /**
     *A Basic check on get card holder info with RFOD field
     *
     * @return void
     */
    public function testRFIDProvided()
    {
        $this->get('api/getCardHolderInfo?cn=' . 'q5shqv3r7bptsuzs6cincoif6esrt3r9')
        ->assertStatus(200)
        ->assertExactJson([[
            "full_name" => "Emily James",
            "department" => [
                "accounting",
                "headquarters"
            ]
        ]]);
    }
}
