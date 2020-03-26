<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\User;

class VisiteurAPITest extends TestCase
{
    /**
     *  test pour valder le contenu de la requete /api/visiteur
     *
     * @return void
     */
  /*  public function testBasicTest()

    {
        $response = $this->call('GET', '/api/visiteur');
        $this->assertEquals(User::all(), $response->getContent());
    }*/

    public function testBasicTest()
    {
        $response = $this->get('/api/visiteur');
        $response->assertStatus(404);
    }

    public function testPraticienInconnue()
    {
        $response = $this->get('/api/visiteur/inconnue/lSRmkcOfgr');
        $response->assertStatus(416);
    }


    public function testPraticienSansRapportDeVisite()
    {
        $response = $this->get('/api/visiteur/Le1/lSRmkcOfgr');
        $response->assertStatus(415);
    }
}
