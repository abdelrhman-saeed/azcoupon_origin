<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer;
use App\Models\Setting;
use App\Models\Store;

class ContactController extends Controller 
{
    public function index()
    {
        $last_updated_at = Store::where('online', 1)->orderBy('updated_at', 'DESC')->first()->updated_at;
        
        $setting = Setting::find(1);
        $contact_meta_title = $setting->contact_meta_title;
        $contact_meta_description = $setting->contact_meta_description;
        
        return view('contact', [
            'contact_meta_title' => $contact_meta_title,
            'contact_meta_description' => $contact_meta_description,
            'last_updated_at' => $last_updated_at
        ]);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'subject' => 'required|min:3|max:100',
            'message' => 'required'
        ]);
        
        \DB::table('contacts')->insert($validated);
        
        // sending contact email here
        
        $text             = "<h1>Hey GALM</h3>";
        $text             .= "<h2>You've contact from $request->name with email: <strong>$request->email</strong></h2><br><br>";
        $text             .= "<h2>Contact Message: </h2><br>";
        $text             .= "<h2>$request->message</h2>";
        
        $mail             = new PHPMailer\PHPMailer();
        $mail->SMTPDebug = false;

        $mail->SMTPAuth   = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "postmaster@glam.it"; // sender email
        $mail->Password = "27Gw7Cv6Tvwuj9fD#"; // sender password
        $mail->SetFrom("postmaster@glam.it", "Glam Contact Message");
        $mail->Subject = $request->subject;
        $mail->Body    = $text;
        $mail->AddAddress("glam.it@gmail.com", 'Glam Support'); // receiver
        
        try
        {
            $mail->send();
            return back()->with('success', 'Grazie per il vostro messaggio.');
        }
        catch(Exception $e){
            return redirect()->route('contact.index')->with('error', 'Error: ' . $e->getMessage());
        }
        
    }
}