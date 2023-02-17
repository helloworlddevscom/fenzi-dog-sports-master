/**
 * WordPress components that create the necessary UI elements for the block
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-components/
 */
import { TextareaControl } from '@wordpress/components';

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

const BlockEdit = (props) => {
	const { attributes, setAttributes } = props;
	const blockProps = useBlockProps();

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
			</InspectorControls>
			<div { ...blockProps } style={blockStyle}>
					<div className="wp-block-hwd-fenzi-primary-hero-textarea-container">
						<TextareaControl
							value={ attributes.title }
							onChange={ ( val ) => setAttributes( { title: val } ) }
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
