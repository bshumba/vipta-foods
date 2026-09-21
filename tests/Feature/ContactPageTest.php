<?php

test('the contact page renders successfully with official contact information', function () {
    $this->get('/contact')
        ->assertSuccessful()
        ->assertSee('info@viptafoods.com')
        ->assertSee('+1 (240) 418-5331')
        ->assertSee('+263 78 760 5189')
        ->assertSee('Let us talk about your next Vipta order.');
});
