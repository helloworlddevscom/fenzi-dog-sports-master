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
			<InspectorControls>
				<PanelBody
					title={__('Link for Card 1', 'awp')}
					initialOpen={ true }
				>
					<TextControl
						value={ attributes.link_a }
						onChange={ ( val ) => setAttributes( { link_a: val } ) }
					/>
				</PanelBody>
				<PanelBody
					title={__('Link for Card 2', 'awp')}
					initialOpen={ true }
				>
					<TextControl
						value={ attributes.link_b }
						onChange={ ( val ) => setAttributes( { link_b: val } ) }
					/>
				</PanelBody>
				<PanelBody
					title={__('Link for Card 3', 'awp')}
					initialOpen={ true }
				>
					<TextControl
						value={ attributes.link_c }
						onChange={ ( val ) => setAttributes( { link_c: val } ) }
					/>
				</PanelBody>
				<PanelBody
					title={__('Link for Card 4', 'awp')}
					initialOpen={ true }
				>
					<TextControl
						value={ attributes.link_d }
						onChange={ ( val ) => setAttributes( { link_d: val } ) }
					/>
				</PanelBody>
			</InspectorControls>
			<div
				{ ...blockProps }>
				<div className="wp-block-hwd-fenzi-dog-cards">

					<div className="wp-block-hwd-fenzi-dog-cards-item-container">
						<div className="wp-block-hwd-fenzi-dog-cards-item">
							<div className="wp-block-hwd-fenzi-dog-cards-img wp-block-hwd-fenzi-dog-cards-img-1"></div>
							<TextControl
								value={ attributes.title_a }
								onChange={ ( val ) => setAttributes( { title_a: val } ) }
							/>
							<div className="wp-block-hwd-fenzi-dog-cards-bottom">
								<a className="wp-block-hwd-fenzi-dog-cards-continue" ><i
									className="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>

					<div className="wp-block-hwd-fenzi-dog-cards-item-container">
						<div className="wp-block-hwd-fenzi-dog-cards-item">
							<div className="wp-block-hwd-fenzi-dog-cards-img wp-block-hwd-fenzi-dog-cards-img-2"></div>
							<TextControl
								value={ attributes.title_b }
								onChange={ ( val ) => setAttributes( { title_b: val } ) }
							/>
							<div className="wp-block-hwd-fenzi-dog-cards-bottom">
								<a className="wp-block-hwd-fenzi-dog-cards-continue" ><i
									className="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>

					<div className="wp-block-hwd-fenzi-dog-cards-item-container">
						<div className="wp-block-hwd-fenzi-dog-cards-item">
							<div className="wp-block-hwd-fenzi-dog-cards-img wp-block-hwd-fenzi-dog-cards-img-3"></div>
							<TextControl
								value={ attributes.title_c }
								onChange={ ( val ) => setAttributes( { title_c: val } ) }
							/>
							<div className="wp-block-hwd-fenzi-dog-cards-bottom">
								<a className="wp-block-hwd-fenzi-dog-cards-continue" ><i
									className="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>

					<div className="wp-block-hwd-fenzi-dog-cards-item-container">
						<div className="wp-block-hwd-fenzi-dog-cards-item">
							<div className="wp-block-hwd-fenzi-dog-cards-img wp-block-hwd-fenzi-dog-cards-img-4"></div>
							<TextControl
								value={ attributes.title_d }
								onChange={ ( val ) => setAttributes( { title_d: val } ) }
							/>
							<div className="wp-block-hwd-fenzi-dog-cards-bottom">
								<a className="wp-block-hwd-fenzi-dog-cards-continue" ><i
									className="fa fa-arrow-right"></i></a>
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
		return { };
	}))(BlockEdit);
