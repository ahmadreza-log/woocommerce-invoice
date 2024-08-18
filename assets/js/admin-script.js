( function () {
    const $ = jQuery

    const wrappers = {
        'list':     '.woocommerce-invoice-list-wrap',
        'settings': '.woocommerce-invoice-settings-wrap',
    }

    $( wrappers.settings ).find( '.sidebar .menu ul li' ).each( function ( index, item ) {
        let _ = $( item )
        let a = _.find( 'a' )

        a.on( 'click', function ( e ) {
            e.preventDefault()

            if ( !_.hasClass( 'active' ) ) {
                let target = $( this ).attr( 'href' )

                $( wrappers.settings ).find( '.sections section' ).hide()
                $( wrappers.settings ).find( '.sections section' + target ).fadeIn()

                $( wrappers.settings ).find( '.sidebar .menu ul li' ).removeClass( 'active' )
                _.addClass( 'active' )
            }
        } )
    } )

} )( jQuery )