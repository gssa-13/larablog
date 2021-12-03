@extends('layouts.blog')

@section('title', 'Contact')

@section('meta-description', 'Contact')

@section('content')
    <!-- Main -->
    <div id="main">
        <article class="post">
            <section id="three">
                <h2>Get In Touch</h2>
                <p>Accumsan pellentesque commodo blandit enim arcu non at amet id arcu magna. Accumsan orci faucibus id eu lorem semper nunc nisi lorem vulputate lorem neque lorem ipsum dolor.</p>
                <div class="row">
                    <div class="col-8 col-12-small">
                        <form method="post" action="#">
                            <div class="row gtr-uniform gtr-50">
                                <div class="col-6 col-12-xsmall"><input type="text" name="name" id="name" placeholder="Name" /></div>
                                <div class="col-6 col-12-xsmall"><input type="email" name="email" id="email" placeholder="Email" /></div>
                                <div class="col-12"><textarea name="message" id="message" placeholder="Message" rows="4"></textarea></div>
                            </div>
                        </form>
                        <ul class="actions">
                            <li><input type="submit" value="Send Message" /></li>
                        </ul>
                    </div>
                    <div class="col-4 col-12-small">
                        <h4>Data</h4>
                        <ul class="alt">
                            <li>
                                <i class="fas fa-home mr-2"></i>
                                <a href="javascript:void(0);">Address 1234 Somewhere Rd. Nashville, TN 00000 United States</a>
                            </li>
                            <li>
                                <i class="icon solid fa-mobile-alt"></i>
                                <a href="javascript:void(0);">000-000-0000</a>
                            </li>
                            <li>
                                <i class="icon solid fa-envelope"></i>
                                <a href="javascript:void(0);">hello@untitled.tld</a>
                            </li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </section>
        </article>
    </div>
    <!-- Main -->
@stop
