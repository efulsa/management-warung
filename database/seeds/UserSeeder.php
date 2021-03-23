<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@wba.com';
        $user->password = Hash::make('password');
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->name = 'abang';
        $user->email = '001@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'ade cgn';
        $user->email = '002@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'agus cgn';
        $user->email = '003@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'ajir kps';
        $user->email = '004@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'alit';
        $user->email = '005@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'amar kps';
        $user->email = '006@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'asep cgn';
        $user->email = '007@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'beni kps';
        $user->email = '008@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'burhan';
        $user->email = '009@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'cahya';
        $user->email = '010@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'candra';
        $user->email = '011@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'cepi';
        $user->email = '012@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'dani';
        $user->email = '013@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'darma';
        $user->email = '014@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'dedin';
        $user->email = '015@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'eja';
        $user->email = '016@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'enteng';
        $user->email = '017@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'erwin kps';
        $user->email = '018@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'esa';
        $user->email = '019@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'feri';
        $user->email = '020@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'hardi';
        $user->email = '021@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'ihsan';
        $user->email = '022@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'indar';
        $user->email = '023@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'irnawan';
        $user->email = '024@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'jenong';
        $user->email = '025@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'mang uden';
        $user->email = '026@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'mayang';
        $user->email = '027@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'neni';
        $user->email = '028@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'nuku';
        $user->email = '029@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'nurholis';
        $user->email = '30@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'oleh';
        $user->email = '031@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pa agus ds';
        $user->email = '032@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pa ari';
        $user->email = '033@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pa ayi';
        $user->email = '034@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pa dede';
        $user->email = '035@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pa dedi cgn';
        $user->email = '036@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pa gunawan';
        $user->email = '037@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pa jajang';
        $user->email = '038@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pa nurman cgn';
        $user->email = '039@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pa ule';
        $user->email = '040@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pa yayan';
        $user->email = '041@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pahmi';
        $user->email = '042@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pitri cgn';
        $user->email = '043@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'pujiawan';
        $user->email = '044@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'ramdan kps';
        $user->email = '045@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'resko';
        $user->email = '046@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'resti cgn';
        $user->email = '047@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'roadi';
        $user->email = '048@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'rosa';
        $user->email = '049@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'rudini';
        $user->email = '050@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'sambas';
        $user->email = '051@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'santi cgn';
        $user->email = '052@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'santi erwin';
        $user->email = '053@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'sidik';
        $user->email = '054@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'siotex';
        $user->email = '055@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'siti macan';
        $user->email = '056@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'soni';
        $user->email = '057@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'suci rhy';
        $user->email = '058@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'suryani';
        $user->email = '059@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'tatang';
        $user->email = '060@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'teh ade';
        $user->email = '061@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'teh dedeh';
        $user->email = '062@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'teh lilis cgn';
        $user->email = '063@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'teh neng cgn';
        $user->email = '064@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'teh neng j';
        $user->email = '065@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'teh ngatmi';
        $user->email = '066@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'teh onil';
        $user->email = '067@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'teh supri';
        $user->email = '068@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'teh wawa';
        $user->email = '069@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'teten';
        $user->email = '070@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'tini cgn';
        $user->email = '071@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'titin';
        $user->email = '072@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'toyib';
        $user->email = '073@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'ujang ai';
        $user->email = '074@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'yaya';
        $user->email = '075@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'yayang';
        $user->email = '076@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();

        $user = new User();
        $user->name = 'yuslan';
        $user->email = '077@wba.com';
        $user->password = Hash::make('12345678');
        $user->role = 'customer';
        $user->save();
    }
}
