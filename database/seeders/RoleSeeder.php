use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['nama_role' => 'mahasiswa'],
            ['nama_role' => 'ketua_prodi'],
            ['nama_role' => 'manajer_operasional'],
            ['nama_role' => 'tata_usaha']
        ]);
    }
}
