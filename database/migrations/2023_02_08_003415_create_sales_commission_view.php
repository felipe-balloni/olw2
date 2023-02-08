<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $query = DB::table('sales as s')
            ->join('sellers as sl', 's.seller_id', '=', 'sl.id')
            ->join('clients as cl', 's.client_id', '=', 'cl.id')
            ->join('companies as c', 'sl.company_id', '=', 'c.id')
            ->join('addresses as a', 'cl.address_id', '=', 'a.id')
            ->join('users as uc', 'cl.user_id', '=', 'uc.id')
            ->join('users as us', 'sl.user_id', '=', 'us.id')
            ->select(
                'c.name as company_name',
                'us.name as seller_name',
                'uc.name as client_name',
                'a.city',
                'a.state',
                's.sold_at',
                's.total_amount',
                's.status',
                DB::raw('s.total_amount * c.commission_rate / 100 as commission')
            )->toSql();

        DB::statement("CREATE MATERIALIZED VIEW create_sales_commission_view AS $query");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::statement('DROP MATERIALIZED VIEW create_sales_commission_view');
    }
};
