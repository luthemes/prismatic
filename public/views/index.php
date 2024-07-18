<?php

// Loads header/*.php templates
Backdrop\View\display( 'header', Backdrop\Template\Hierarchy\hierarchy() );

// Loads content/*.php templates
Backdrop\View\display( 'content', Backdrop\Template\Hierarchy\hierarchy() );

// Loads footer/*.php templates
Backdrop\View\display( 'footer', Backdrop\Template\Hierarchy\hierarchy() );
