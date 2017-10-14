<?php

namespace Corp\Http\Controllers;
use Corp\Mail\MailClass;
use Illuminate\Http\Request;
use Mail;

class ContactsController extends SiteController
{
    public function __construct()
    {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->bar = 'left';
        $this->template = config('settings.THEME').'.contacts';
    }

    public function index(Request $request)
    {

        if( $request->isMethod('post') ) {
            $this->validate($request,[
                'name'  => 'required|max:255',
                'email' => 'required|email',
                'message'  => 'required'
            ]);
            $data = $request->all();
            if( Mail::to(config('settings.admin_email'))
                ->send(new MailClass($data['name'],$data['email'],$data['message'])) ) {
                return redirect()->route('contact')->with('status', 'Email is send');
            }
        }

        $this->title = 'Contact';

        $content = view(config('settings.THEME').'.contact_content')->render();
        $this->vars = array_add($this->vars,'content',$content);

        $this->contentLefttBar = view(config('settings.THEME').'.contact_bar')->render();

        return $this->renderOutput();
    }
}
