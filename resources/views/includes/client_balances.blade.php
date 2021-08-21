<section>
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h4 class="fs-4 fw-bold">$. {{Auth::user()->balanceFloat}}</h4>
                    <h5 class="fs-5">DUE AND UNPAID</h5>

                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h4 class="fs-4 fw-bold">${{Auth::user()->getWallet('refund')?Auth::user()->getWallet('refund')->balanceFloat:'0.00'}}</h4>
                    <h5 class="fs-5">REFUNDS</h5>

                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 mx-auto text-center m-2">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h4 class="fs-4 fw-bold">${{Auth::user()->projects->sum('client_pay')}}</h4>
                    <h5 class="fs-5">TOTAL SPENT</h5>

                </div>
            </div>
        </div>
    </div>
</section>
