<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminPanel extends Component
{
    public $email;
    public $confirmingTeamMemberRemoval;
    public $removeUserId;

    public function mount()
    {
        $this->confirmingTeamMemberRemoval = false;
    }

    public function render()
    {
        $admins = User::where('role_id', 2)->get();

        return view('livewire.admin.admin-panel', compact('admins'));
    }

    public function addAdmin()
    {
        $this->validate(
            [
                'email' => 'required|email'
            ],
            [
                'required' => 'El campo :attribute es necesario',
                'email' => 'El campo :attribute debe contener una dirección válida'
            ],
            [
                'email' => 'Correo'
            ]
        );

        $user = User::with('role')->where('email', $this->email)->first();

        if (isset($user)) {
            if ($user->role_id == 2) {
                session()->flash('repeated', 'El correo ingresado ya es administrador');
            }
            else {
                $user->update(['role_id' => 2]);
                session()->flash('success', 'Añadido con éxito');
                return redirect()->to('/admin/panel');
            }
        }
        else {
            session()->flash('failed', 'El correo ingresado no existe');
        }
    }

    public function confirmTeamMemberRemoval($userId)
    {
        $this->removeUserId = $userId;
        $this->confirmingTeamMemberRemoval = !$this->confirmingTeamMemberRemoval;
    }

    public function removeTeamMember()
    {
        User::with('role')->where('id', $this->removeUserId)->update(['role_id' => 1]);
        $this->confirmingTeamMemberRemoval = !$this->confirmingTeamMemberRemoval;
    }
}
