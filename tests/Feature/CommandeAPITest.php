<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommandeAPITest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/api/commande');
        $response->assertStatus(404);
    }

    public function testPraticienInconnue()
    {
        $response = $this->get('/api/commande/inconnue/lSRmkcOfgr');
        $response->assertStatus(434);
    }


    public function testPraticienSansCommande()
    {
        $response = $this->get('/api/commande/Roussa/lSRmkcOfgr');
        $response->assertStatus(434);
    }
}
