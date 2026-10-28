<?php

// Loads header/*.php templates
Backdrop\View\display( 'header', Backdrop\Template\hierarchy() );

// Loads content/*.php templates
Backdrop\View\display( 'content', Backdrop\Template\hierarchy() );

// Loads footer/*.php templates
Backdrop\View\display( 'footer', Backdrop\Template\hierarchy() );
