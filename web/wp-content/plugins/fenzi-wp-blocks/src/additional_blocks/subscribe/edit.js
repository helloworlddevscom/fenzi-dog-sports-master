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

	return (
		<Fragment>
			<div { ...blockProps }>
				<div className="hwd-subscribe-container hwd-menu-container">
					<TextControl
						value={ attributes.title }
						onChange={ ( val ) => setAttributes( { title: val } ) }
					/>
					<div className="hwd-subscribe-form">
						<div className="hwd-subscribe-form-reg-flex">
							<input type="text" placeholder="Your First Name..."
								   className="hwd-w-100 hwd-translucent-input"/>
						</div>
						<div className="hwd-subscribe-form-reg-flex">
							<input type="text" placeholder="Your Last Name..." className="hwd-w-100 hwd-translucent-input"/>
						</div>
						<div className="hwd-subscribe-form-extra-flex">
							<input type="email" placeholder="Your Email Address..."
								   className="hwd-w-100 hwd-translucent-input"/>
						</div>
						<div className="hwd-subscribe-form-reg-flex">
							<TextControl
								value={ attributes.cta }
								onChange={ ( val ) => setAttributes( { cta: val } ) }
							/>
						</div>
					</div>
				</div>
			</div>

		</Fragment>
	);
};


export default compose(
	withSelect((select, props) => {
		return { };
	}))(BlockEdit);
