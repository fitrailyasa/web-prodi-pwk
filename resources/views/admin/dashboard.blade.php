<x-admin-layout>

    <!-- Title -->
    <x-slot name="title">
        Dashboard
    </x-slot>

    <!-- Content -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>{{ $datas }}</h3>

                    <p>{{ __('Data') }}</p>
                </div>
                <a href="{{ route('admin.data.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $categories }}</h3>

                    <p>{{ __('Data') }}</p>
                </div>
                <a href="{{ route('admin.category.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>{{ $eras }}</h3>

                    <p>{{ __('Data') }}</p>
                </div>
                <a href="{{ route('admin.era.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $links }}</h3>

                    <p>{{ __('Data') }}</p>
                </div>
                <a href="{{ route('admin.link.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

</x-admin-layout>
