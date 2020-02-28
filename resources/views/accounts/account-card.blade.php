<div class="card account-card">

    {{-- Account description card --}}
    <div class="card-body">

        {{-- Account title --}}
        <div class="card-title">
            <h3>
                {{-- Name --}}
                {{ $account->firstName }} {{ $account->lastName }} <br/>

                {{-- Information about company --}}
                @if ($account->companyName || $account->position)
                    <small class="text-muted">
                        @if ($account->companyName)
                            {{ $account->companyName }}
                        @endif

                        @if ($account->companyName && $account->position)
                            -
                        @endif

                        @if ($account->position)
                            {{ $account->position }}
                        @endif
                    </small>
                @endif
            </h3>
        </div>
        {{-- End card title --}}

        {{-- Card body --}}
        <div class="row">

            {{-- Email link --}}
            <div class="col-md-6">
                <a href="mailto:{{ $account->email }}">
                    <i class="fas fa-envelope"></i>
                    {{ $account->email }}
                </a>
            </div>

            {{-- Phone numbers --}}
            <div class="col-md-6">
                <ul class="phones">

                    {{-- Phone 1 --}}
                    @if ($account->phone1)
                        <li>
                            <a href="tel:{{ $account->phone1 }}">
                                <i class="fas fa-phone"></i>
                                {{ $account->phone1 }}
                            </a>
                        </li>
                    @endif

                    {{-- Phone 2 --}}
                    @if ($account->phone2)
                        <li>
                            <a href="tel:{{ $account->phone2 }}">
                                <i class="fas fa-phone"></i>
                                {{ $account->phone2 }}
                            </a>
                        </li>
                    @endif

                    {{-- Phone 3 --}}
                    @if ($account->phone3)
                        <li>
                            <a href="tel:{{ $account->phone3 }}">
                                <i class="fas fa-phone"></i>
                                {{ $account->phone3 }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            {{-- End phone numbers --}}
        </div>
    </div>

    {{-- Card footers with action links --}}
    <div class="card-footer text-right">

        {{-- Edit button --}}
        <a href="{{ route('accountEditForm', ['id' => $account->id]) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i>
            Edit
        </a>

        {{-- Delete button --}}
        <a href="{{ route('delete', ['id' => $account->id]) }}" class="btn btn-danger">
            <i class="fas fa-trash"></i>
            Delete
        </a>
    </div>
</div>
