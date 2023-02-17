/**
 * WordPress components that create the necessary UI elements for the block
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-components/
 */
import { TextControl, TextareaControl } from '@wordpress/components';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { useBlockProps } from '@wordpress/block-editor';
const { registerBlockType } = wp.blocks;
const { InspectorControls, MediaUpload, MediaUploadCheck } = wp.blockEditor;
const { PanelBody, Button, ResponsiveWrapper } = wp.components;
const { Component, Fragment } = wp.element;
const { withSelect } = wp.data;
const { __ } = wp.i18n;
const { compose } = wp.compose;
import { useSelect } from '@wordpress/data';

const BlockEdit = (props) => {
	const { attributes, setAttributes } = props;
	const blockProps = useBlockProps();

	const selectPosts = useSelect( ( select ) => {
		return select( 'core' ).getEntityRecords( 'postType', 'post' );
	}, [] );


	return (
		<Fragment>
			<InspectorControls>
				<PanelBody
					title={__('Max Number of Posts to Show', 'awp')}
					initialOpen={ true }>
					<TextControl
						value={ attributes.numberOfPosts }
						onChange={ ( val ) => setAttributes( { numberOfPosts: val } ) }
					/>
				</PanelBody>
			</InspectorControls>
			<div
				class="wp-block-hwd-fenzi-recent-blog-posts"
				{ ...blockProps }>
				<TextControl
					value={ attributes.title }
					onChange={ ( val ) => setAttributes( { title: val } ) }
				/>
				{ ! selectPosts && 'Loading' }
				{ selectPosts && selectPosts.length === 0 && 'No Posts' }
				{ selectPosts && selectPosts.length > 0 && selectPosts.map((p, i) =>
					<div class="wp-block-hwd-fenzi-recent-blog-posts-item">
						<a href={ p.link }>
							{ p.title.rendered }
						</a></div>
				) }
			</div>
		</Fragment>
	);
};


export default compose(
	withSelect((select, props) => {
		return { };
	}))(BlockEdit);
