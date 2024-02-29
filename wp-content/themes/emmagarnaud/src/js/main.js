(function(wp) {
    let addFilter = wp.hooks.addFilter;
    let createHigherOrderComponent = wp.compose.createHigherOrderComponent;
    let Fragment = wp.element.Fragment;
    let InspectorControls = wp.blockEditor.InspectorControls;
    let PanelBody = wp.components.PanelBody;
    let TextControl = wp.components.TextControl;
    let withSelect = wp.data.withSelect;
    let withDispatch = wp.data.withDispatch;

    let withInspectorControl = createHigherOrderComponent((BlockEdit) => {
        return withSelect((select, ownProps) => {
            // Récupérez la valeur de la méta-donnée personnalisée
            const { getEditedPostAttribute } = select('core/editor');
            const meta = getEditedPostAttribute('meta');
            return {
                monChampPersonnalise: meta['slick'],
            };
        })(withDispatch((dispatch, ownProps, { select }) => {
            // Fonction pour mettre à jour la méta-donnée
            return {
                setMonChampPersonnalise(value) {
                    const { editPost } = dispatch('core/editor');
                    const meta = select('core/editor').getEditedPostAttribute('meta');
                    meta['slick'] = value;
                    editPost({ meta });
                }
            };
        })((props) => {
            return (
                <Fragment>
                    <BlockEdit {...props} />
                    <InspectorControls>
                        <PanelBody title="Champ Personnalisé">
                            <TextControl
                                label="Entrez un nombre"
                                value={props.monChampPersonnalise}
                                onChange={(value) => props.setMonChampPersonnalise(value)}
                            />
                        </PanelBody>
                    </InspectorControls>
                </Fragment>
            );
        }));
    }, 'withInspectorControl');

    addFilter(
        'editor.BlockEdit',
        'mon-plugin/with-inspector-control',
        withInspectorControl
    );
})(window.wp);
