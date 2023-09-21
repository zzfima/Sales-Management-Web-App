<?php

namespace Tests\Feature;

use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_fail_path(): void
    {
        $response = $this->postJson('/api/createNewSale',
            [
                "amount" => "",
                "productName" => "Pants",
                "currency" => "US"
            ]);

        $response->assertJson([
            "status_code" => 1,
            "status_error_details" => "Invalid price, out of min-max bounds",
            "status_additional_info" => 123,
            "status_error_code" => 352
        ]);
    }

    public function test_happy_path(): void
    {
        $price = 33.2;
        $response = $this->postJson('/api/createNewSale',
            [
                "amount" => $price,
                "productName" => "Pants",
                "currency" => "US"
            ]);

        $response->assertJson([
            "status_code" => 0,
            "sale_url" => "https://sandbox.payme.io/sale/generate/SALE1498-567890BD-XKYB7QH5-C3MQXRKB",
            "currency" => "US"
        ]);

        $receivedPrice = $response->getData()->price;
        self::assertEquals($price * 100, $receivedPrice, 0.2);
    }
}
