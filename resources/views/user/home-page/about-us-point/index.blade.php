<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-title">{{ __('About Us Points') }}</div>
                    </div>
                    <div class="col-lg-4">
                      
                    </div>
                    <div class="col-lg-4">
                        <a href="#" data-toggle="modal" data-target="#createModal"
                            class="btn btn-primary btn-sm float-lg-right float-left"><i class="fas fa-plus"></i>
                            {{ __('Add') }}</a>

                        <button class="btn btn-danger btn-sm float-right mr-2 d-none bulk-delete"
                            data-href="{{ route('user.home_page.delete_about-us-point_all') }}">
                            <i class="flaticon-interface-5"></i> {{ __('Delete') }}
                        </button>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        @if (count($aboutPoints) == 0)
                            <h3 class="text-center mt-2">{{ __('NO About Us Point FOUND') . '!' }}</h3>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped mt-3" id="basic-datatables">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <input type="checkbox" class="bulk-check" data-val="all">
                                            </th>
                                            <th scope="col">{{ __('Icon') }}</th>
                                            <th scope="col">{{ __('Title') }}</th>
                                            <th scope="col">{{ __('Text') }}</th>
                                            <th scope="col">{{ __('Serial Number') }}</th>
                                            <th scope="col">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($aboutPoints as $point)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="bulk-check"
                                                        data-val="{{ $point->id }}">
                                                </td>
                                                <td>
                                                    <i class="{{ $point->icon }}"></i>
                                                </td>
                                                <td>{{ $point->title }}</td>
                                                <td>{{ $point->text }}</td>
                                                <td>{{ $point->serial_number }}</td>
                                                <td>
                                                    <a class="btn btn-secondary btn-sm mr-1 editbtn"
                                                        href="{{ route('user.home_page.edit_about-us-point', ['id' => $point->id, 'language' => request()->input('language')]) }}">
                                                        <span class="btn-label">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                        {{ __('Edit') }}
                                                    </a>

                                                    <form class="deleteform d-inline-block"
                                                        action="{{ route('user.home_page.delete_about-us-point', ['id' => $point->id]) }}"
                                                        method="post">

                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                                            <span class="btn-label">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
