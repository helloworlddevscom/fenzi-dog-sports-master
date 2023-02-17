/**
 * WordPress components that create the necessary UI elements for the block
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-components/
 */
import { TextControl, SelectControl } from '@wordpress/components';

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
					title={__('Show Filters', 'awp')}
					initialOpen={ true }
				>
					<SelectControl
						label="Show Filters"
						value={ attributes.showFilters }
						options={ [
							{ label: 'Yes', value: true },
							{ label: 'No', value: false },
						] }
						onChange={ ( val ) => setAttributes( { showFilters: val } ) }
					/>
				</PanelBody>
				<PanelBody
					title={__('Category Limit', 'awp')}
					initialOpen={ true }
				>
					<TextControl
						label="Limit results to this category"
						value={ attributes.categoryLimit }
						onChange={ ( val ) => setAttributes( { categoryLimit: val } ) }
					/>
				</PanelBody>
			</InspectorControls>
			<div { ...blockProps }>
				<div className="wp-block-hwd-fenzi-courses-container">
					<div className="wp-block-hwd-fenzi-courses-title-container">
						<TextControl
							value={ attributes.title }
							onChange={ ( val ) => setAttributes( { title: val } ) }
						/>
					</div>
					<div className="wp-block-hwd-fenzi-courses-items-container">
						<div className="wp-block-hwd-fenzi-course-item-container">
							<div className="wp-block-hwd-fenzi-course-item">
								<div className="wp-block-hwd-fenzi-course-img wp-block-hwd-fenzi-course-img-1"></div>
								<div className="wp-block-hwd-fenzi-course-text-container">
									<h5 className="wp-block-hwd-fenzi-course-number">AB123</h5>
									<h3 className="wp-block-hwd-fenzi-course-title">This is my course title</h3>
									<h3 className="wp-block-hwd-fenzi-course-author"><a href="/">Instructor Smith</a></h3>
									<p className="wp-block-hwd-fenzi-course-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
								</div>
								<div className="wp-block-hwd-fenzi-course-bottom">
									<a className="wp-block-hwd-fenzi-course-category" href="/"><img
										className="wp-block-hwd-fenzi-course-category-icon" alt="/" src="/wp-content/plugins/fenzi-wp-blocks/assets/img/FDSA_icon_Enroll_Silver.svg"/>Discipline</a>
									<a className="wp-block-hwd-fenzi-course-continue" href="/"><i
										className="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>

						<div className="wp-block-hwd-fenzi-course-item-container">
							<div className="wp-block-hwd-fenzi-course-item">
								<div className="wp-block-hwd-fenzi-course-img wp-block-hwd-fenzi-course-img-1"></div>
								<div className="wp-block-hwd-fenzi-course-text-container">
									<h5 className="wp-block-hwd-fenzi-course-number">AB123</h5>
									<h3 className="wp-block-hwd-fenzi-course-title">This is my course title</h3>
									<h3 className="wp-block-hwd-fenzi-course-author"><a href="/">Instructor Smith</a></h3>
									<p className="wp-block-hwd-fenzi-course-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
								</div>
								<div className="wp-block-hwd-fenzi-course-bottom">
									<a className="wp-block-hwd-fenzi-course-category" href="/"><img
										className="wp-block-hwd-fenzi-course-category-icon" alt="/" src="/wp-content/plugins/fenzi-wp-blocks/assets/img/FDSA_icon_Enroll_Silver.svg"/>Discipline</a>
									<a className="wp-block-hwd-fenzi-course-continue" href="/"><i
										className="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>

						<div className="wp-block-hwd-fenzi-course-item-container">
							<div className="wp-block-hwd-fenzi-course-item">
								<div className="wp-block-hwd-fenzi-course-img wp-block-hwd-fenzi-course-img-1"></div>
								<div className="wp-block-hwd-fenzi-course-text-container">
									<h5 className="wp-block-hwd-fenzi-course-number">AB123</h5>
									<h3 className="wp-block-hwd-fenzi-course-title">This is my course title</h3>
									<h3 className="wp-block-hwd-fenzi-course-author"><a href="/">Instructor Smith</a></h3>
									<p className="wp-block-hwd-fenzi-course-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
								</div>
								<div className="wp-block-hwd-fenzi-course-bottom">
									<a className="wp-block-hwd-fenzi-course-category" href="/"><img
										className="wp-block-hwd-fenzi-course-category-icon" alt="/" src="/wp-content/plugins/fenzi-wp-blocks/assets/img/FDSA_icon_Enroll_Silver.svg"/>Discipline</a>
									<a className="wp-block-hwd-fenzi-course-continue" href="/"><i
										className="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>


					</div>
					<div className="wp-block-hwd-fenzi-courses-ctas">
						<div className="wp-block-hwd-fenzi-courses-cta-div"><a className="wp-block-hwd-fenzi-courses-cta" href="/courses">See
							More Courses<i className="fa fa-chevron-right"></i></a></div>
						<div className="wp-block-hwd-fenzi-courses-cta-div"><a className="wp-block-hwd-fenzi-courses-cta" href="/workshops">See
							More Workshops<i className="fa fa-chevron-right"></i></a></div>
						<div className="wp-block-hwd-fenzi-courses-cta-div"><a className="wp-block-hwd-fenzi-courses-cta" href="/webinars">See
							Webinars<i className="fa fa-chevron-right"></i></a></div>
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
