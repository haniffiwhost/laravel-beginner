php artisan make:migration create_posts_table
lepas tu pegi file database/migration/xxtarikh_xx_create_post_table.php tambah 2 line ni depends apa atrribute yang ada dalam table entity tu
===============================
public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');       // For the title of the post
            $table->text('content'); 
            $table->timestamps();
        });
    }
===============================

php artisan migrate
php artisan make:seeder PostSeeder
lepastu cek dekat phpmyadmin SHOW TABLES;

lepastu seed data pakai cmd command ni
php artisan make:seeder PostSeeder
letak data dulu dalam koding:
==============================
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'Sample Post',
            'content' => 'This is the content of the sample post.'
        ]);
    }
}
==================================

php artisan db:seed --class=PostSeeder

lepastu clear everything
php artisan cache:clear
php artisan config:clear
php artisan serve


ni nno 4 kalau lupa buat step atas ni
4. Rerun the Seeder
After fixing the table schema, rerun the PostSeeder:

bash
Copy code
php artisan db:seed --class=PostSeeder

5. Verify the Table
Check the posts table in your database to ensure the data is seeded properly:

sql
Copy code
SELECT * FROM posts;