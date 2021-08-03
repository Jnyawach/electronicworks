<?php

namespace App\Console\Commands;

use App\Models\invoice;
use Illuminate\Console\Command;

class InvoiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monthly invoice';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($invoice=Invoice::where('status', 1)->get()->last()){
        $invoice->update(['status'=>0]);
            $newnumber='000'.$invoice->id+1;
            $invoice_number='EL'.$newnumber;
            $invoice=Invoice::create([
                'number'=>$invoice_number,
                'status'=>1,
            ]);
    }else{
            $newnumber=$invoice->id+1;
        $invoice_number='EL'.$newnumber;
        $invoice=Invoice::create([
            'number'=>$invoice_number,
            'status'=>1,
        ]);
    }
    }
}
