<div class="card mb-5 mb-xxl-5 bg-transparent">
    <div class="card-header d-flex align-items-center justify-content-between  bg-white py-0 px-3">

        <div class="d-flex align-items-center position-relative my-1">
            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                        transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                    <path
                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
            <input type="search" wire:model="q" class="form-control form-control-solid w-250px ps-14"
                placeholder="Search " />
        </div>
        <div class="">
            <select class="form-select" wire:model="status">
                <option value="">All</option>
                @foreach ($itemstatus as $status)
                    <option value="{{ $status->id }}">{{ $status->label }}</option>
                @endforeach

            </select>
        </div>
    </div>

    @foreach ($items as $item)
        <x-item-card :item="$item" />
        {{-- <hr> --}}
    @endforeach
    @if ($items->links()->paginator->hasPages())
        <div class="mt-4 p-4 box has-text-centered w-fit mx-auto">
            {{ $items->links() }}
        </div>
    @endif
</div>
