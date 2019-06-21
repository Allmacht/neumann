<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        VerifyEmail::toMailUsing(function ($notifiable) {
            $verifyUrl = URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(60),
                ['id' => $notifiable->getKey()]
            );

            return (new MailMessage())
                ->subject('Verificación de cuenta')
                ->greeting('Hola!')
                ->line('Haga clic en el botón de abajo para verificar su dirección de correo electrónico.')
                ->action('Verificar correo electrónico', $verifyUrl)
                ->line('Si usted no ha creado la cuenta, ignore este mensaje.')
                ->salutation('Saludos, ' . config('app.name'));
        });
    }
}
