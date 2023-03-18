{{-- @props('item') --}}
<div class="menu-item px-3">
    {{-- {{ $item->id }} --}}
    <button href="#" id="kt_docs_sweetalert_basic"
        data-id="{{ $itemid }}" data-status="1"
        class="menu-link px-3 border-0 bg-transparent statusChange">Active</button>
</div>
<div class="menu-item px-3">
    <button href="#" id="kt_docs_sweetalert_basic"
        data-id="{{ $itemid }}" data-status="2"
        class="menu-link px-3 border-0 bg-transparent statusChange">Pending</button>
</div>
<div class="menu-item px-3">
    <button href="#" id="kt_docs_sweetalert_basic"
        data-id="{{ $itemid }}" data-status="3"
        class="menu-link px-3 border-0 bg-transparent statusChange">Rejected</button>
</div>
<div class="menu-item px-3">
    <button href="#" id="kt_docs_sweetalert_basic"
        data-id="{{ $itemid }}" data-status="4"
        class="menu-link px-3 border-0 bg-transparent statusChange">Featured</button>
</div>
<div class="menu-item px-3">
    <button href="#" id="kt_docs_sweetalert_basic"
        data-id="{{ $itemid }}" data-status="5"
        class="menu-link px-3 border-0 bg-transparent statusChange">Deactivated</button>
</div>

