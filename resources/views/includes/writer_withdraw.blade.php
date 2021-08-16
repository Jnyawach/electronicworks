<section>
    <h5 class="fw-bold">Financial Dashboard

    </h5>

    <hr class="dropdown-divider mt-4">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@include('includes.writer_finance')

</section>
