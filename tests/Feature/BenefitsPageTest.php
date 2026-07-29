<?php

test('the benefits page renders successfully', function () {
    $this->get('/benefits')
        ->assertSuccessful()
        ->assertSee('Health and intimate-wellness benefits, explained with care.')
        ->assertSee('Food-first, not medicine.')
        ->assertSee('Traditional intimate-wellness uses, worded responsibly.');
});
