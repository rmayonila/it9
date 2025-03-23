public function up()
{
    Schema::table('admins', function (Blueprint $table) {
        $table->string('name')->after('id');
        $table->string('email')->unique()->after('username');
    });
}

public function down()
{
    Schema::table('admins', function (Blueprint $table) {
        $table->dropColumn(['name', 'email']);
    });
}