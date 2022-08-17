<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img 
            src="{{ asset('assets/images/icons/logo-svg.svg') }}"
            class="logo-icon">
        </div>
        <div>
            <h4 class="logo-text">mycoupons.hk</h4>
        </div>
        <div class="toggle-icon ms-auto">
            <i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.index') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>     
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-investment'></i>
                </div>
                <div class="menu-title">Coupons</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('admin.coupons.index') }}"><i class="lni lni-list"></i>All Coupons</a>
                </li>
                <li>
                    <a href="{{ route('admin.coupons.create') }}"><i class="lni lni-circle-plus"></i>Add New Coupon</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-investment'></i>
                </div>
                <div class="menu-title">Offers</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('admin.coupons.offers') }}"><i class="lni lni-list"></i>All Offers</a>
                </li>
                <li>
                    <a href="{{ route('admin.coupons.createoffer') }}"><i class="lni lni-circle-plus"></i>Add New Offers</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-tag'></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('admin.categories.index') }}"><i class="lni lni-list"></i>All Categories</a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.create') }}"><i class="lni lni-circle-plus"></i>Add New Category</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-cart'></i>
                </div>
                <div class="menu-title">Stores</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('admin.stores.index') }}"><i class="lni lni-list"></i>All Stores</a>
                </li>
                
                <li> 
                    <a href="{{ route('admin.stores.index') }}?store_degree=premium"><i class="lni lni-list"></i>Premium Stores</a>
                </li>
                
                <li> 
                    <a href="{{ route('admin.stores.index') }}?store_degree=medium"><i class="lni lni-list"></i>Medium Stores</a>
                </li>
                
                <li> 
                    <a href="{{ route('admin.stores.index') }}?store_degree=lower"><i class="lni lni-list"></i>Lower Stores</a>
                </li>
                
                <li>
                    <a href="{{ route('admin.stores.create') }}"><i class="lni lni-circle-plus"></i>Add New Store</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-target'></i>
                </div>
                <div class="menu-title">Events</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('admin.events.index') }}"><i class="lni lni-list"></i>All Events</a>
                </li>
                <li>
                    <a href="{{ route('admin.events.create') }}"><i class="lni lni-circle-plus"></i>Add New Event</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('admin.users.index') }}"><i class="lni lni-list"></i>All Users</a>
                </li>
                <li>
                    <a href="{{ route('admin.users.create') }}"><i class="lni lni-circle-plus"></i>Add New User</a>
                </li>
            </ul>
        </li>
        
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-wallet'></i>
                </div>
                <div class="menu-title">Static Pages</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('admin.pages.index') }}"><i class="lni lni-list"></i>All Pages</a>
                </li>
                
                <li> 
                    <a href="{{ route('admin.pages.create') }}"><i class="lni lni-circle-plus"></i>Add New Page</a>
                </li>
            </ul>
        </li>
        
        <li>
            <a href="{{ route('admin.subscribers') }}">
                <div class="parent-icon"><i class='bx bx-mail-send'></i>
                </div>
                <div class="menu-title">Email Subscribers</div>
            </a>     
        </li>

        <li>
            <a href="{{ route('admin.phone_subscribers') }}">
                <div class="parent-icon"><i class='bx bx-phone'></i>
                </div>
                <div class="menu-title">Phone Subscribers</div>
            </a>     
        </li>
        
        <li>
            <a href="{{ route('admin.contacts.index') }}">
                <div class="parent-icon"><i class='bx bx-envelope-open'></i>
                </div>
                <div class="menu-title">Contacts</div>
            </a>     
        </li>

        <hr>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Sidebar Widgets</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('admin.widgets.index') }}"><i class="lni lni-list"></i>All Widgets</a>
                </li>
                
                <li> 
                    <a href="{{ route('admin.widgets.index') }}?related_sidebar=Topcoupons"><i class="lni lni-list"></i>Topcoupons Widgets</a>
                </li>
                
                <li> 
                    <a href="{{ route('admin.widgets.index') }}?related_sidebar=Expiresoon"><i class="lni lni-list"></i>Expiredsoon Widgets</a>
                </li>
                <li> 
                    <a href="{{ route('admin.widgets.index') }}?related_sidebar=Search"><i class="lni lni-list"></i>Search Result Widgets</a>
                </li>
                
                <li>
                    <a href="{{ route('admin.widgets.create') }}"><i class="lni lni-circle-plus"></i>Add New Widget</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ route('admin.slider.index') }}">
                <div class="parent-icon"><i class='bx bx-slider'></i>
                </div>
                <div class="menu-title">Slider</div>
            </a>     
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cog'></i></i></div>
                <div class="menu-title">Setting</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('admin.setting.index') }}">
                        <i class='bx bx-cog'></i> Main Setting
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.homedeals') }}">
                        <i class="lni lni-home"></i>Home Special Deals
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.top_voucher_codes') }}">
                        <i class="lni lni-home"></i>Top voucher codes
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.footer') }}">
                        <i class="lni lni-home"></i>Footer
                    </a>
                </li>
                
            </ul>
        </li>
        
        <li>
            <a href="{{ route('admin.setting.export_db') }}">
                <div class="parent-icon"><i class='bx bx-download'></i>
                </div>
                <div class="menu-title">Export Database Tables</div>
            </a>     
        </li>

        <li>
            <a href="{{ route('home.index') }}" target='_blank'>
                <div class="parent-icon"><i class='lni lni-eye'></i>
                </div>
                <div class="menu-title">Visit Site</div>
            </a>     
        </li>

    </ul>
</div>