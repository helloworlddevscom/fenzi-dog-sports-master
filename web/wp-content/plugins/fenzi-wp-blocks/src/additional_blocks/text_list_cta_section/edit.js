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
					title={__('CTA Link', 'awp')}
					initialOpen={ true }
				>
					<TextControl
						value={ attributes.ctaLink }
						onChange={ ( val ) => setAttributes( { ctaLink: val } ) }
					/>
				</PanelBody>
			</InspectorControls>
			<div { ...blockProps }>
				<div className="wp-block-hwd-fenzi-test-list-cta-section">
					<TextControl
						value={ attributes.title }
						onChange={ ( val ) => setAttributes( { title: val } ) }
					/>
					<div className="wp-block-hwd-fenzi-test-list-cta-row">
						<div className="wp-block-hwd-fenzi-test-list-cta-section-col">
							<div className="wp-block-hwd-fenzi-text-list-cta-section-item">
								<div className="wp-block-hwd-fenzi-text-list-cta-section-item-img wp-block-hwd-fenzi-text-list-cta-section-item-img-1"></div>
								<div className="wp-block-hwd-fenzi-text-list-cta-section-item-text">
									<TextControl
										value={ attributes.title1 }
										onChange={ ( val ) => setAttributes( { title1: val } ) }
									/>
									<TextareaControl
										value={ attributes.description1 }
										onChange={ ( val ) => setAttributes( { description1: val } ) }
									/>
								</div>
							</div>

							<div className="wp-block-hwd-fenzi-text-list-cta-section-item">
								<div className="wp-block-hwd-fenzi-text-list-cta-section-item-img wp-block-hwd-fenzi-text-list-cta-section-item-img-2"></div>
								<div className="wp-block-hwd-fenzi-text-list-cta-section-item-text">
									<TextControl
										value={ attributes.title2 }
										onChange={ ( val ) => setAttributes( { title2: val } ) }
									/>
									<TextareaControl
										value={ attributes.description2 }
										onChange={ ( val ) => setAttributes( { description2: val } ) }
									/>
								</div>
							</div>

							<div className="wp-block-hwd-fenzi-text-list-cta-section-item">
								<div className="wp-block-hwd-fenzi-text-list-cta-section-item-img wp-block-hwd-fenzi-text-list-cta-section-item-img-3"></div>
								<div className="wp-block-hwd-fenzi-text-list-cta-section-item-text">
									<TextControl
										value={ attributes.title3 }
										onChange={ ( val ) => setAttributes( { title3: val } ) }
									/>
									<TextareaControl
										value={ attributes.description3 }
										onChange={ ( val ) => setAttributes( { description3: val } ) }
									/>
								</div>
							</div>

						</div>
						<div className="wp-block-hwd-fenzi-test-list-cta-section-col">
							<div className="wp-block-hwd-fenzi-text-list-cta-section-item">
								<div className="wp-block-hwd-fenzi-text-list-cta-section-item-img wp-block-hwd-fenzi-text-list-cta-section-item-img-4"></div>
								<div className="wp-block-hwd-fenzi-text-list-cta-section-item-text">
									<TextControl
										value={ attributes.title4 }
										onChange={ ( val ) => setAttributes( { title4: val } ) }
									/>
									<TextareaControl
										value={ attributes.description4 }
										onChange={ ( val ) => setAttributes( { description4: val } ) }
									/>
								</div>
							</div>

							<div className="wp-block-hwd-fenzi-text-list-cta-section-item">
								<div className="wp-block-hwd-fenzi-text-list-cta-section-item-img wp-block-hwd-fenzi-text-list-cta-section-item-img-5"></div>
								<div className="wp-block-hwd-fenzi-text-list-cta-section-item-text">
									<TextControl
										value={ attributes.title5 }
										onChange={ ( val ) => setAttributes( { title5: val } ) }
									/>
									<TextareaControl
										value={ attributes.description5 }
										onChange={ ( val ) => setAttributes( { description5: val } ) }
									/>
								</div>
							</div>

							<div className="wp-block-hwd-fenzi-text-list-cta-section-item">
								<div className="wp-block-hwd-fenzi-text-list-cta-section-item-img wp-block-hwd-fenzi-text-list-cta-section-item-img-6"></div>
								<div className="wp-block-hwd-fenzi-text-list-cta-section-item-text">
									<TextControl
										value={ attributes.title6 }
										onChange={ ( val ) => setAttributes( { title6: val } ) }
									/>
									<TextareaControl
										value={ attributes.description6 }
										onChange={ ( val ) => setAttributes( { description6: val } ) }
									/>
								</div>
							</div>
						</div>

					</div>
					<TextControl
						value={ attributes.ctaTitle }
						onChange={ ( val ) => setAttributes( { ctaTitle: val } ) }
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
