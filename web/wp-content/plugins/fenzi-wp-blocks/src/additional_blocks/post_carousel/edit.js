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
			<InspectorControls>
				<PanelBody
					title={__('Select block background image', 'awp')}
					initialOpen={ true }
				>
					<div className="editor-post-featured-image">
						<MediaUploadCheck>
							<MediaUpload
								onSelect={onSelectMedia}
								value={attributes.mediaId}
								allowedTypes={ ['image'] }
								render={({open}) => (
									<Button
										className={attributes.mediaId == 0 ? 'editor-post-featured-image__toggle' : 'editor-post-featured-image__preview'}
										onClick={open}
									>
										{attributes.mediaId == 0 && __('Choose an image', 'awp')}
										{props.media != undefined &&
											<ResponsiveWrapper
												naturalWidth={ props.media.media_details.width }
												naturalHeight={ props.media.media_details.height }
											>
												<img src={props.media.source_url} />
											</ResponsiveWrapper>
										}
									</Button>
								)}
							/>
						</MediaUploadCheck>
						{attributes.mediaId != 0 &&
							<MediaUploadCheck>
								<MediaUpload
									title={__('Replace image', 'awp')}
									value={attributes.mediaId}
									onSelect={onSelectMedia}
									allowedTypes={['image']}
									render={({open}) => (
										<Button onClick={open} isDefault isLarge>{__('Replace image', 'awp')}</Button>
									)}
								/>
							</MediaUploadCheck>
						}
						{attributes.mediaId != 0 &&
							<MediaUploadCheck>
								<Button onClick={removeMedia} isLink isDestructive>{__('Remove image', 'awp')}</Button>
							</MediaUploadCheck>
						}
					</div>
				</PanelBody>

				<PanelBody
					title={__('Post Type', 'awp')}
					initialOpen={ true }
				><TextControl
						value={ attributes.postType }
						onChange={ ( val ) => setAttributes( { postType: val } ) }
					/>
				</PanelBody>
			</InspectorControls>
			<div
				{ ...blockProps }>
				<div className="wp-block-hwd-fenzi-post-carousel-container" style={blockStyle}>
					<TextControl
						value={attributes.title}
						onChange={(val) => setAttributes({title: val})}
					/>
					<div className="wp-block-hwd-fenzi-post-carousel-slides">
						<div className="wp-block-hwd-fenzi-post-carousel-slide">
							<div className="wp-block-hwd-fenzi-post-carousel-slide-card">
								<div className="wp-block-hwd-fenzi-post-carousel-slide-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
								<div className="wp-block-hwd-fenzi-post-carousel-slide-bottom">
									<div className="wp-block-hwd-fenzi-post-carousel-slide-img wp-block-hwd-fenzi-post-carousel-slide-img-1"></div>
									<h4 className="wp-block-hwd-fenzi-post-carousel-slide-title">My Person Name</h4>
								</div>

							</div>
						</div>

					</div>

					<TextControl
						value={attributes.ctaTitle}
						onChange={(val) => setAttributes({ctaTitle: val})}
					/>
				</div>
			</div>
		</Fragment>
	);
};


export default compose(
	withSelect((select, props) => {
		return { media: props.attributes.mediaId ? select('core').getMedia(props.attributes.mediaId) : undefined };
	}))(BlockEdit);

