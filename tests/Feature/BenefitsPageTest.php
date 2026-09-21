<?php

test('the benefits page renders successfully', function () {
    $this->get('/benefits')
        ->assertSuccessful()
        ->assertSee('Nature\'s Wellness, Backed by Science')
        ->assertSee('Wellness Through Nutrition')
        ->assertSee('Honouring traditional intimate-health wisdom.');
});
