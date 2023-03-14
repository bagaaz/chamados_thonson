<?php

namespace Tests\Feature;

use App\Models\Call;
use Tests\TestCase;

class CallsControllerTest extends TestCase
{
    protected $call;

    public function testCalls()
    {
        $this->create();
        $this->list();
        $this->edit();
        $this->deleteItem();
    }

    public function create()
    {
        $data = [
            'title' => 'Chamado Teste',
            'description' => 'Descrição do chamado de teste',
            'service_order' => '001-65685-2021',
            'local_mnemonic' => 'HEM',
            'outside_mnemonic' => 'HEM2',
            'priority_id' => 2,
            'caller_id' => 1,
            'status_id' => 1,
            'image' => null,
        ];
        $url = route('calls.store');
        $response = $this->post($url, $data);
        $response->assertStatus(302);
        $this->call = Call::get()->last();
        $this->assertEquals($this->call->title, $data['title']);
    }

    public function list()
    {
        $url = route('calls');
        $response = $this->get($url);
        $response->assertStatus(200);

        $response->assertSee($this->call->title);
    }

    public function edit()
    {
        $data = [
            'title' => 'Chamado Teste Atualizado',
            'description' => 'Descrição do chamado de teste atualizado',
            'service_order' => '001-65685-2023',
            'local_mnemonic' => 'HEM',
            'outside_mnemonic' => 'HEM3',
            'priority_id' => 2,
            'caller_id' => 1,
            'status_id' => 3,
        ];

        $url = route('calls.update', $this->call->id);
        $response = $this->post($url, $data);
        $response->assertStatus(302);

        $this->call = Call::find($this->call->id);
        $this->assertEquals($this->call->title, $data['title']);
    }

    public function deleteItem()
    {
        $url = route('calls.destroy', $this->call->id);
        $response = $this->get($url, ['call' => $this->call->id]);
        $response->assertStatus(302);

        $this->assertNull(Call::find($this->call->id));

        Call::whereNotNull('deleted_at')->forceDelete();
    }
}
