<div class="sidebar">
    <!-- Categories -->
    <div class="sidebar_section">
        <div class="sidebar_section_title">School By Location</div>
        <div class="sidebar_categories" id="accordion">
            <div class="province">
                <a href="{{ route('search', request()->only('keyword')) }}" class="province-paragraph {{ getSchoolSidebarAccordionClass(request()->input('province_id') == null, request()->input('district_id') == null, request()->input('municipality_id') == null) }}" >
                    All
                </a>
            </div>
            @foreach($provinces as $key=>$province)
                <div class="province">
                    <div id="heading-{{$key}}">
                            <a href="#" class="province-paragraph {{ $key == 0 ? null : 'collapsed' }}" data-toggle="collapse" data-target="#collapse-{{$key}}" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}" aria-controls="collapse-{{$key}}">
                                {{ $province->name }}
                            </a>
                    </div>

                    <div id="collapse-{{$key}}" class="collapse {{ $key == 0 ? null : null }}" aria-labelledby="heading-{{$key}}" data-parent="#accordion">
                        <div class="district">
                                <a href="{{ route('search', array_merge(request()->only('keyword'), ['province_id' => encrypt($province->id)])) }}" class="district-paragraph" >
                                    All
                                </a>
                        </div>
                        @foreach($province->districts as $key1=>$district)
                            <div class="district">
                                <div id="heading-{{$key.$key1}}">
                                        <a href="#" class="district-paragraph {{ $key1 == 0 ? null : 'collapsed' }}" data-toggle="collapse" data-target="#collapse-{{$key.$key1}}" aria-expanded="{{ $key1 == 0 ? 'true' : 'false' }}" aria-controls="collapse-{{$key.$key1}}">
                                            {{ $district->name }}
                                        </a>
                                </div>

                                <div id="collapse-{{$key.$key1}}" class="collapse {{ $key1 == 0 ? null : null }}" aria-labelledby="heading-{{$key.$key1}}" data-parent="#collapse-{{$key}}">
                                    <div class="city">
                                        <a href="{{ route('search', array_merge(request()->only('keyword'), ['district_id' => encrypt($district->id)])) }}" class="city-paragraph">All</a>
                                    </div>
                                    @foreach($district->municipalities as $municipality)
                                        <div class="city">
                                            <a href="{{ route('search', array_merge(request()->only('keyword'), ['municipality_id' => encrypt($municipality->id)])) }}" class="city-paragraph">{{ $municipality->name }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
