<?php
namespace Corp\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class MailClass extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    protected $email;
    protected $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$message)
    {
        $this->name  = $name;
        $this->email = $email;
        $this->message  = $message;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'name'  => $this->name,
            'email' => $this->email,
            'message'  => $this->message,
        ];
        return $this->view(config('settings.THEME').'.email',['data'=>$data])
            ->subject(config('app.name') . ' - NEW EMAIL');
    }
}