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

	const removeMedia = () => {
		props.setAttributes({
			mediaId: 0,
			mediaUrl: ''
		});
	}

	const onSelectMedia = (media) => {
		props.setAttributes({
			mediaId: media.id,
			mediaUrl: media.url
		});
	}

	const blockStyle = {
		backgroundImage: attributes.mediaUrl != '' ? 'url("' + attributes.mediaUrl + '")' : 'none'
	};

	return (
		<Fragment>
			<div
				{ ...blockProps }>
				<div className="wp-block-hwd-fenzi-course-categories-container" style={blockStyle}>
					<TextControl
						value={attributes.title}
						onChange={(val) => setAttributes({title: val})}
					/>

					<div className="wp-block-hwd-fenzi-course-categories-items">
						<div className="wp-block-hwd-fenzi-course-categories-item">
							<a className="wp-block-hwd-fenzi-course-categories-img-link" href="/"><div className="wp-block-hwd-fenzi-course-categories-img wp-block-hwd-fenzi-course-categories-img-1"></div></a>
							<div className="wp-block-hwd-fenzi-course-categories-text">
								<h4 className="wp-block-hwd-fenzi-course-categories-text-title">My Course Category</h4>
								<p className="wp-block-hwd-fenzi-course-categories-text-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								<div className="wp-block-hwd-fenzi-course-categories-bottom">
									<a className="wp-block-hwd-fenzi-course-categories-continue" href="/"><i
										className="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</Fragment>
	);
};


export default compose(
	withSelect((select, props) => {
		return { media: props.attributes.mediaId ? select('core').getMedia(props.attributes.mediaId) : undefined };
	}))(BlockEdit);

