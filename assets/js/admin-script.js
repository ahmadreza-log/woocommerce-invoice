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

    $( wrappers.settings ).find( '.field-upload-wrapper .upload-box' ).each( function ( index, item ) {
        let _      = $( item )
        let button = _.find( 'button.upload-button' )
        let input  = _.find( 'input' )

        button.on( 'click', function ( e ) {
            e.preventDefault()

            let image = wp.media( {
                title: 'Upload Image',
            } )

            image.open()

            image.on( 'select', function ( e ) {
                let { url } = image.state().get( 'selection' ).first().toJSON()
                input.val( url );
                _.append( '<button type="button" class="reset-button">' + WC_Invoice_Config.reset_button + '</button>' )

                _.find( '.reset-button' ).on( 'click', function () {
                    input.val( '' )
                    $( this ).remove()
                } )
            } );
        } )
    } )

} )( jQuery )