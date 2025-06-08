<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PurchaseSuccess extends Notification
{
    use Queueable;

    public function __construct()
    {
        
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Compra Realizada com Sucesso!')
                    ->line('Sua compra foi concluída com sucesso. Obrigado por comprar conosco!')
                    ->action('Ver Pedido', url('/orders'))
                    ->line('Se você tiver alguma dúvida, entre em contato com nosso suporte.');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Sua compra foi concluída com sucesso!',
        ];
    }
}
