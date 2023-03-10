<div class="aside-secondary d-flex flex-row-fluid">
    <!--begin::Workspace-->
    <div class="aside-workspace scroll scroll-push my-2">
        <!--begin::Tab Content-->
        <div class="tab-content">
            <!--begin::Tab Pane-->
            {{-- optional(\Auth::user())->user_type == \App\Models\User::STORE || optional(\Auth::user())->user_type == \App\Models\User::STOREADMIN --}}
            @if(0)
                @include('partials.storesidebar')
            @else
                @include('partials.adminsidebar')
            @endif

        </div>
        <!--end::Tab Content-->
    </div>
    <!--end::Workspace-->
</div>
