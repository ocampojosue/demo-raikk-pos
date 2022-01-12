<div>
    <style></style>
    <div class="row layout-top-spacing">
        <div class="col-sm-12 col-md-8">
            {{-- DETALLES --}}
            @include('livewire.pos.partials.detail')
        </div>
        <div class="col-sm-12 col-md-4">
            {{-- TOTAL --}}
            @include('livewire.pos.partials.total')
            {{-- COINS --}}
            @include('livewire.pos.partials.coins')
        </div>
    </div>
</div>
<script src="{{asset('plugins/onscan/onscan.min.js')}}"></script>
<script src="{{asset('plugins/keypress/keypress-2.1.5-2.js')}}"></script>
@include('livewire.pos.scripts.events')
@include('livewire.pos.scripts.general')
@include('livewire.pos.scripts.scan')
@include('livewire.pos.scripts.shortcuts')