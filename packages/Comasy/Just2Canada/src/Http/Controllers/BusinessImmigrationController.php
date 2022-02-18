<?php

namespace Comasy\J2C\Http\Controllers;

use App\Models\User;
use Comasy\J2C\Models\ApplicationForm;
use Comasy\J2C\Models\BusinessImmigration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;

class BusinessImmigrationController extends Controller
{
    public function submit(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        Validator::make($request->toArray(), [
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'country' => 'required',
            'nationality' => 'required',
            'reference' => 'required',
            'currently_in_canada' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'experience' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'describe' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'qualification' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'dob' => 'required',
            'marital_status' =>  function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'spouse_dob' => function ($attribute, $value, $fail) use ($request) {
                if ($request->marital_status == 'married' && ($value == '' || $value == null)) {
                    $fail('This field is required');
                }
            },
            'spouse_experience' => function ($attribute, $value, $fail) use ($request) {
                if ($request->marital_status == 'married' && ($value == '' || $value == null)) {
                    $fail('This field is required');
                }
            },
            'no_of_children' => function ($attribute, $value, $fail) use ($request) {
                if (($request->marital_status == 'married' || $request->marital_status == 'divorced' || $request->marital_status == 'legally_seperated') && ($value === '' || $value === null)) {
                    $fail('This field is required');
                }
            },
            'has_children_lt_22' => function ($attribute, $value, $fail) use ($request) {
                if (($request->marital_status == 'married' || $request->marital_status == 'divorced' || $request->marital_status == 'legally_seperated') && ($value == '' || $value == null)) {
                    $fail('This field is required');
                }
            },
            'children_enrolled' => function ($attribute, $value, $fail) use ($request) {
                if (($request->marital_status == 'married' || $request->marital_status == 'divorced' || $request->marital_status == 'legally_seperated') && ($value == '' || $value == null)) {
                    $fail('This field is required');
                }
            },
            'children_canadian' => function ($attribute, $value, $fail) use ($request) {
                if (($request->marital_status == 'married' || $request->marital_status == 'divorced' || $request->marital_status == 'legally_seperated') && ($value == '' || $value == null)) {
                    $fail('This field is required');
                }
            },
            'children_mental' => function ($attribute, $value, $fail) use ($request) {
                if (($request->marital_status == 'married' || $request->marital_status == 'divorced' || $request->marital_status == 'legally_seperated') && ($value == '' || $value == null)) {
                    $fail('This field is required');
                }
            },
            'ordered_to_leave' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'arrested' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'been_military' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'employed_security' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'visited' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'visited_countries' => function ($attribute, $value, $fail) use ($request) {
                if ($request->visited == 'yes' && ($value == '' || $value == null || !$value)) {
                    $fail('This field is required');
                }
            },
            'has_blood_relative' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'relative_province' => function ($attribute, $value, $fail) use ($request) {
                if ($request->has_blood_relative == 'yes' && ($value == '' || $value == null || !$value)) {
                    $fail('This field is required');
                }
            },
            'visited_canada' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'visited_in_2' => function ($attribute, $value, $fail) use ($request) {
                if ($request->visited_canada == 'yes' && ($value == '' || $value == null || !$value)) {
                    $fail('This field is required');
                }
            },
            'visited_province' => function ($attribute, $value, $fail) use ($request) {
                if ($request->visited_canada == 'yes' && $request->visited_in_2 == 'yes' && ($value == '' || $value == null || !$value)) {
                    $fail('This field is required');
                }
            },
            'refused' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'refused_detail' => function ($attribute, $value, $fail) use ($request) {
                if ($request->refused == 'yes' && ($value == '' || $value == null || !$value)) {
                    $fail('This field is required');
                }
            },
            'assets' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'language_test' =>  function ($attribute, $value, $fail) {
                if ($value == '' || $value == null) {
                    $fail('This field is required');
                }
            },
            'language_proficiency' =>  function ($attribute, $value, $fail) use ($request) {
                if ($request->language_test == 'no' && ($value == '' || $value == null || !$value)) {
                    $fail('This field is required');
                }
            },
            'interested_programs' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null || !$value) {
                    $fail('This field is required');
                }
            },
            'prefered_location' => function ($attribute, $value, $fail) {
                if ($value == '' || $value == null || !$value) {
                    $fail('This field is required');
                }
            },
            'password' => [
                function ($attribute, $value, $fail) use ($request, $user) {
                    if (!Auth::check()) {
                        if (!$user) {
                            if ($request->password != $request->password_confirmation) {
                                $fail('Password does not match');
                            }
                        } else {
                            if (!Hash::check($value, $user->password)) {
                                $fail('Incorrect Password');
                            }
                        }
                    }
                }
            ],
        ])->validate();

        if (!$user) {
            $user = User::create([
                'name' => $request->firstname . ' ' . $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }
        if (!Auth::user()) {
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);
        }
        /*
        $model = new BusinessImmigration($request->only([
            'fullname',
            'email',
            'phone',
            'country',
            'nationality',
            'reference',
            'currently_in_canada',
            'experience',
            'describe',
            'qualification',
            'dob',
            'marital_status',
            'ordered_to_leave',
            'arrested',
            'been_military',
            'employed_security',
            'visited',
            'has_blood_relative',
            'visited_canada',
            'refused',
            'assets',
            'language_test',
            'interested_programs',
            'prefered_location'
        ]));
        */
        $model = new BusinessImmigration($request->except('password', 'password_confirmation'));
        $model->save();

        $applicationFormModel = new ApplicationForm();
        $applicationFormModel->application_id = 'AF' . $model->created_at->year . $model->created_at->month . $model->created_at->day . str_pad($model->id, 3, '0', STR_PAD_LEFT);
        $applicationFormModel->status = 'pending';
        $applicationFormModel->user_id = $user->id;
        $model->application_form()->save($applicationFormModel);

        $this->sendMail($model->application_form->id, $request->fullname, $request->email);
        return response()->json(['message' => 'success']);
    }

    public function sendMail($id, $name, $email)
    {
        $message = $this->ComposeFormtoEmailToSender($id);
        $mailer = new PHPMailer();
        $mailer->CharSet = 'utf-8';


        $mailer->addAddress('info@just2canada.ca');
        $mailer->addAddress('info@tastechnologies.com');
        $mailer->addAddress('shabeeboali@gmail.com');
        $mailer->Subject = "Just To Canada from $name";



        $mailer->From = 'info@just2canada.ca';



        $mailer->FromName = $name;



        $mailer->AddReplyTo($email);

        $textMsg = trim(strip_tags(preg_replace('/<(head|title|style|script)[^>]*>.*?<\/\\1>/s', '', $message)));

        $mailer->AltBody = @html_entity_decode($textMsg, ENT_QUOTES, "UTF-8");

        $mailer->MsgHTML($message);

        if (!$mailer->Send()) {

            Log::error("Failed sending email!");

            return false;
        }
        return true;
    }

    public function GetHTMLHeaderPart()

    {

        $retstr = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">' . "\n" .

            '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title></title>' .

            '';

        $retstr .= $this->GetMailStyle();

        $retstr .= '<table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:12px; border:1px solid #006; color:#000;" width="650">
	<tbody>
		<tr>
			<td align="center" style="padding:10px;" valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
					<tr>
						<td align="center"><img src="https://just2canada.ca/images/logo.png" /></td>
					</tr>

				</tbody>
			</table>
			</td>
		</tr>';

        $retstr .= '</head><body>';

        return $retstr;
    }

    public
    function GetMailStyle()

    {

        $retstr = "\n<style>" .

            "body,.label,.value { font-family:Arial,Verdana; } " .

            ".label {font-weight:bold; margin-top:5px; font-size:1em; color:#333;} " .

            ".value {margin-bottom:15px;font-size:1.0em;padding-left:5px;} " .

            "</style>\n";



        return $retstr;
    }

    public function GetHTMLFooterPart()

    {

        $retstr = '<tr>

			<td align="center" bgcolor="#1c3e93" height="70" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#ffffff;font-weight:normal; " valign="middle">

			<table border="0" cellpadding="0" cellspacing="0" width="95%">

				<tbody>

					<tr>

						<td width="53%">Call Us: <a href="tel:9055860440" value="9055860440" target="_blank" style="color:#fff"> (905) 586 0440 </a><br />
						
						Email Id: <a href="mailto:info@just2canada.ca" style="color:#fff;"> info@just2canada.ca</a>

						&nbsp;</td>

						

						<td align="right" width="47%">  Address: 1200 Derry Rd E, Mississauga, ON L5T 1B6, Canada  
               </td>

					</tr>

				</tbody>

			</table>

			</td>

		</tr>

	</tbody>

</table>



</body>

</html>';

        return $retstr;
    }

    function ComposeFormtoEmailToSender($id)

    {

        $header = $this->GetHTMLHeaderPart();

        $formsubmission = $this->FormSubmissionToMail($id);

        $footer = $this->GetHTMLFooterPart();



        //$message = $header."<div style='background:#fff; color:#000; font-size:18px; padding:10px; text-align:left;'><center><img src=\"http://seowithus.com/webmaster1/EB-service/10-march-2017/images/logo.png\"></center><p>$formsubmission</p><p><h1><center>Thank you for contacting us.<br /><br /></center></h1><center>We have received your Form Submission our Staff will be contacting you within 24 hours.<br /><br /><strong>Have a great day ahead!</strong></center></p></div>".$footer;

        $message = $header;

        $message .= '<tr>

			<td style="padding:10px 20px; " valign="top">

			<table border="0" cellpadding="0" cellspacing="0" width="100%">

				<tbody>

					<tr>

						<td height="20" style="background-color:#ECECEC;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#000;padding:7px 0 6px 13px;text-transform:uppercase; border:1px solid #ECECEC; border-bottom:0px;">Detail:</td>

					</tr>

					<tr>

						<td bgcolor="#fff" style="padding:10px 10px; border:1px solid #ECECEC;">

						<table border="0" cellpadding="0" cellspacing="0" width="100%">

							<tbody>

								<tr>

									<td valign="top" width="80%">

									<table cellpadding="0" cellspacing="0" width="100%">

										<tbody>';

        $message .= $formsubmission;

        $message .= '</tbody></table><tr><td style="width:100%"><h1>Thank you for contacting us.</h1><br /><br />We have received your Form Submission our Staff will be contacting you within 24 hours.<br /><br /><strong>Have a great day ahead!</strong></tr></td>';



        $message .= '</tbody>

									</table>

									</td>

								</tr>

							</tbody>

						</table>

						</td>

					</tr>

					<tr>

						<td>&nbsp;</td>

					</tr>

					<tr>

						<td bgcolor="#FFFFFF" height="5">&nbsp;</td>

					</tr>

					

				 

			</td>

		</tr>';

        $message .= $footer;



        return $message;
    }

    public function FormSubmissionToMail($id)
    {
        $afdata = ApplicationForm::find($id);
        $str = view('components.view-business-immigration-form2', ['afdata' => $afdata])->render();
        return $str;
    }
}
