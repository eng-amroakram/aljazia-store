<div class="aside-secondary d-flex flex-row-fluid">
    <!--begin::Workspace-->
    <div class="aside-workspace scroll scroll-push my-2">
        <!--begin::Tab Content-->
        <div class="tab-content">
            <!--begin::Tab Pane-->

        <!--end::Tab Pane-->
            <!--begin::Tab Pane-->
            <div class="tab-pane {{ (request()->is('company-offer')|| request()->is('sub-category') ||  request()->is('category')  || request()->is('store-driver')  || request()->is('product') ||request()->is('offer') || request()->is('area') || request()->is('time') || request()->is('point') || request()->is('color') || request()->is('size')) ? "p-3 px-lg-7 py-lg-5 fade show active":"fade" }}" id="kt_aside_tab_2">
                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid px-10 py-5" id="kt_aside_menu_wrapper">
                    <!--begin::Menu Container-->
                    <div id="kt_aside_menu" class="aside-menu min-h-lg-800px" data-menu-vertical="1"
                         data-menu-scroll="1">
                        <!--begin::Menu Nav-->
                        <ul class="menu-nav">

                            {{-- @forelse($user_links as $user_link)
                                @if($user_link->parent)
                                    @forelse($user_link->parent as $parent)
                                        @if($parent->parent_id == 2)
                                            <li class="menu-item {{ (request()->is($parent->slug)) ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="\{{ $parent->slug }}" class="menu-link menu-toggle">
                                                    {!! $parent->icon !!}
                                                    <span class="menu-text">{{ $parent->title_ar }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @empty
                                    @endforelse
                                @endif
                            @empty
                            @endforelse --}}
                        </ul>
                        <!--end::Menu Nav-->
                    </div>
                    <!--end::Menu Container-->
                </div>
                <!--end::Aside Menu-->
            </div>


            <!--end::Tab Pane-->
            <div class="tab-pane {{ (request()->is('cp/order-new') ||request()->is('order-new') || request()->is('cp/order-wait')  ||request()->is('order-wait')  || request()->is('cp/order-accept') ||request()->is('order-accept') || request()->is('cp/order-delivery') ||request()->is('order-delivery') || request()->is('cp/order-done') ||request()->is('order-done') || request()->is('cp/order-invalid') ||request()->is('order-invalid') || request()->is('rate')) ? "p-3 px-lg-7 py-lg-5 fade show active":"fade" }}" id="kt_aside_tab_3">
                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid px-10 py-5" id="kt_aside_menu_wrapper">
                    <!--begin::Menu Container-->
                    <div id="kt_aside_menu" class="aside-menu min-h-lg-800px" data-menu-vertical="1"
                         data-menu-scroll="1">
                        <!--begin::Menu Nav-->
                        <ul class="menu-nav">
                            {{-- @forelse($user_links as $user_link)
                                @if($user_link->parent)
                                    @forelse($user_link->parent as $parent)
                                        @if($parent->parent_id == 3)
                                            <li class="menu-item {{ (request()->is($parent->slug)) ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="\{{ $parent->slug }}" class="menu-link menu-toggle">
                                                    {!! $parent->icon !!}
                                                    <span class="menu-text">{{ $parent->title_ar }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @empty
                                    @endforelse
                                @endif
                            @empty
                            @endforelse --}}
                        </ul>
                    </div>
                </div>
            </div>


            <div class="tab-pane {{ (request()->is('notification') || request()->is('contact') || request()->is('support') || request()->is('page') || request()->is('setting')) ? "p-3 px-lg-7 py-lg-5 fade show active":"fade" }}" id="kt_aside_tab_4">
                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid px-10 py-5" id="kt_aside_menu_wrapper">
                    <!--begin::Menu Container-->
                    <div id="kt_aside_menu" class="aside-menu min-h-lg-800px" data-menu-vertical="1"
                         data-menu-scroll="1">
                        <!--begin::Menu Nav-->
                        <ul class="menu-nav">
                            {{-- @forelse($user_links as $user_link)
                                @if($user_link->parent)
                                    @forelse($user_link->parent as $parent)
                                        @if($parent->parent_id == 4)
                                            <li class="menu-item {{ (request()->is($parent->slug)) ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="\{{ $parent->slug }}" class="menu-link menu-toggle">
                                                    {!! $parent->icon !!}
                                                    <span class="menu-text">{{ $parent->title_ar }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @empty
                                    @endforelse
                                @endif
                            @empty
                            @endforelse --}}
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!--end::Tab Content-->
    </div>
    <!--end::Workspace-->
</div>
