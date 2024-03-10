<div class="section-area section-sp2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center heading-bx">
                <h2 class="title-head m-b0">Upcoming <span>Events</span></h2>
                <p class="m-b0">Upcoming Education Events To Feed Brain. </p>
            </div>
        </div>
        <div class="row">
            <div class="upcoming-event-carousel owl-carousel owl-btn-center-lr owl-btn-1 col-12 p-lr0  m-b30">
                @foreach ($events as $event)
                    <div class="item">
                        <div class="event-bx">
                            <div class="action-box">
                                <img src="{{ asset($event->img) }}" alt="">
                            </div>
                            <div class="info-bx d-flex">
                                <div>
                                    <div class="event-time">
                                        <div class="event-date"><?php echo date('d', strtotime($event->day)); ?></div>
                                        <div class="event-month"><?php echo date('F', strtotime($event->day)); ?></div>
                                    </div>
                                </div>
                                <div class="event-info">
                                    <h4 class="event-title">
                                        <a href="#">
                                            {{$event->title}}
                                        </a>
                                    </h4>
                                    <ul class="media-post">
                                        <li><a href="#"><i class="fa fa-clock-o"></i>
                                                {{ date('H:i a', $event->date_start) }}
                                                {{ date('H:i a', $event->date_end) }}</a></li>
                                        <li><a href="#"><i class="fa fa-map-marker"></i> 
                                            {{$event->location}}</a></li>
                                    </ul>
                                    <p>
                                        <?php
                                            echo Str::substr($event->text, 3, 80). "..."
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="text-center">
            <a href="#" class="btn">View All Event</a>
        </div>
    </div>
</div>
