//------v1.6-ezafeshodane pasokhe sarie ersal moshakhasat kharbar be admin dakhele robat.
ob_start();

$API_KEY = '679470470:AAF60B0RZC49SM1OKDuDmJKhToUP8WS2w0k';
##------------------------------##
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
	function Forward($KojaShe,$AzKoja,$KodomMSG)
{
    bot('ForwardMessage',[
        'chat_id'=>$KojaShe,
        'from_chat_id'=>$AzKoja,
        'message_id'=>$KodomMSG
    ]);
}
function sendphoto($chat_id, $photo, $action){
	bot('sendphoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'action'=>$action
	]);
	}
	function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
    }
    
 // فانکشن مربوط به جوین اجباری برای کانال   
    function check_channel_member($channel , $chat_id){
	$res = bot("getChatMember" , array("chat_id" => $channel , "user_id" => $chat_id));
	if(isset($res->result->user) && $res->result->status == "member"){
		return "yes";
	}elseif($res->result->status == "administrator"){
		return "yes";
	}elseif($res->result->status == "creator"){
		return "yes";
	}else{
	    return "no";
	}
}


	//====================ᵗᶦᵏᵃᵖᵖ======================//
$inputtel = file_get_contents('php://input');
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
mkdir("data/$from_id");
// Variable Source 
$message_id = $message->message_id;
$from_id = $message->from->id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$chat = $message->message->chat;
$type = $message->message->chat->type;
$date = $message->message->chat->date;
$text = $message->text;

$ADMIN = 671292689;

//تنها متغییر مربوط  به جوین اجباری کانال در زیر
$channel="frinternet";

//forward_from_chatمتغییرهای مربوط به -------------------------------------
$forward_from_chat_id = $message->message->forward_from_chat->id;
$title = $message->forward_from_chat->title;
$type1 = $message->message->forward_from_chat->type;
//forward_from_message_idمتغییرهای مربوط به -------------------------------------
$forward_from_message_id = $message->message->forward_from_message_id;
//videoمتغییرهای مربوط به -------------------------------------
$video = $message->message->video->file_id;
//$video1 = $decode->message->video[1]->file_id;
//$video2 = $decode->message->video[2]->file_id;
//$video3 = $decode->message->video[3]->file_id;
$caption = $message->message->caption;
//file_idمتغییرهای مربوط به -------------------------------------
//$photo = $decode->message->photo->file_id;
$document = $message->message->document->file_id;
$audio = $message->message->audio->file_id;
$voice = $message->message->voice->file_id;
$sticker = $message->message->sticker->file_id;
$photo2 = $message->message->photo[2]->file_id;
$photo1 = $message->message->photo[1]->file_id;
$photo0 = $message->message->photo[0]->file_id;
//-------------------------------------------------------------------------------------------------------
if($text == "/start"){
if (!file_exists("data/$from_id/MohammadReza.txt")) {
        mkdir("data/$from_id");
        file_put_contents("data/$from_id/MohammadReza.txt","none");
        $myfile2 = fopen("Member.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    }
        sendAction($chat_id, 'typing');
	
        bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"◀️  سلام به ربات جیسون دی کدر کانال اف آر اینترنت خوش آمدید.
❓ این ربات اطلاعات ارسالی از ای پی آی تلگرام را برای شما دی کد میکند و میتوانید از اطلاعات ان در برنامه های خود استفاده کنید. 
✅  با استفاده از دستور /help  همواره میتوانید از راهنمایی بیشتر و دستورات نحوه استفاده از ربات اشنا شوید .

@frinternet",
	'parse_mode'=>$mode
	]);
         bot('sendMessage',[
	'chat_id'=>$ADMIN,
	'text'=>" 🤖  ادمین جان کاربری با مشخصات زیر ربات رو استارت کرد :
$from_id 
first_name : $first_name
last_name  : $last_name
username   : @$username
👌
",
	'parse_mode'=>$mode
	]);
}
elseif($text !== "/start" && $text !='/id' && $text !='/help'){

        sendAction($chat_id, 'typing');
        
bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$inputtel,
	'parse_mode'=>$mode
	]);
	}
	elseif($text == "/id"){

        sendAction($chat_id, 'typing');
        
bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$chat_id,
	'parse_mode'=>$mode
	]);
	}
	elseif($text == "/help"){

        sendAction($chat_id, 'typing');
        
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✴️  ادمین محترم به منوی راهنما خوش امدید ✴️ 

❇️  راهنما و دستورات منوی کمک ( هلپ )

🔻🔻🔻🔻🔻🔻🔻🔻🔻

● /help
-| ارسال راهنمایی ربات (همین متن)

● /start
-| شرو به کار و  همچنین باز گشت به منوی اصلی و همین طور جهت تست کردن فعال و اکتیو بودن ربات استفاده میگردد.

● /id
-| نمایش ایدی عددی شما ( یوزر ایدی )

● 
-|بغیر از دستورات بالا با نوشتن یا فوروارد کردن هر نوع پیامی ، اعم از متن ، فایل ، ویدیو ؛ و... 
میتوانید اطلاعات مربوط به آن را جهت استفاده خودتان استخراج و استفاده نمایید .

Souce By *#Mohammadreza*",
'parse_mode'=> 'MaRkDowN',
]);
}
