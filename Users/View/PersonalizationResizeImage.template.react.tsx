import React, { useState, useCallback } from '/node_modules/react';
import ReactDOM from '/node_modules/react-dom';
import Cropper from '/node_modules/react-easy-crop';
import { getOrientation } from '/node_modules/get-orientation/browser';
import { Button } from '/node_modules/react-bootstrap';
import styled from '/node_modules/styled-components';
import RangeSlider from '/node_modules/react-bootstrap-range-slider';
import { RequestFormData } from '/src/Numbers/Request.ts';
//import '/node_modules/bootstrap/dist/css/bootstrap.css'; // or include from a CDN
import '/node_modules/react-bootstrap-range-slider/dist/react-bootstrap-range-slider.css';

const CropContainer = styled.div`
    position: relative;
    width: 100%;
    height: 400px;
    display: block;
`;

const ControlsContainer = styled.div`
    padding: 16px;
    display: block;
`;

const ORIENTATION_TO_ANGLE = {
  '3': 180,
  '6': 90,
  '8': -90,
}

const PersonalizationResizeImage = ({
    props,
    loaded,
}: any) => {
    const {
        um_usrpersonal_user_id: UserID,
        um_usrpersonal_module_code: ModuleCode,
        id_file_id: IDFileID,
        id_file_url: IDFileURL,
        id_save_id: IDSaveID,
        id_subform_id: IDSubformID,
    } = props;

    const [imageSrc, setImageSrc] = React.useState(null)
    const [crop, setCrop] = useState({ x: 0, y: 0 });
    const [rotation, setRotation] = useState(0);
    const [zoom, setZoom] = useState(1);
    const [aspect, setAspect] = useState(1);
    const [croppedAreaPixels, setCroppedAreaPixels] = useState(null);
    const [croppedImage, setCroppedImage] = useState(null);
    const [croppedImage2, setCroppedImage2] = useState(null);

    const onCropComplete = (croppedArea, croppedAreaPixels) => {
        setCroppedAreaPixels(croppedAreaPixels)
    }

    const saveFileUsingAPI = async () => {
        let formData = new FormData();
        const blob = await getCroppedBlob(croppedImage, croppedAreaPixels);
        formData.append('file', blob, 'photo_' + UserID + '_' + ModuleCode + '.png');
        formData.append('um_usrpersonal_user_id', UserID);
        formData.append('um_usrpersonal_module_code', ModuleCode);
        let upload = await RequestFormData('/API/V1/UM/PhotoUpload/_PhotoUpload', formData);
        if (upload.success) {
            // send an event
            /*
            const event = new CustomEvent('nf_um_user_upload_for_personalization_resize_form_event', { detail: {
                um_usrpersonal_user_id: UserID,
                um_usrpersonal_module_code: ModuleCode,
                um_usrpersonal_photo_file_id: upload['file_id'],
                um_usrpersonal_photo_file_url: upload['file_url'],
            }});
            window.dispatchEvent(event);
            */
            // update
            console.log(IDFileID, IDFileURL, IDSaveID);
            document.getElementById(IDFileID).value  = upload['file_id'];
            document.getElementById(IDFileURL).value  = upload['file_url'];
            document.getElementById(IDSaveID).click();
            window.Numbers.Modal.hide('form_subform_' + IDSubformID + '_form');
        }
    };

    const getCroppedBlob = (imageSrc, crop) => {
        return new Promise((resolve) => {
            const image = new Image();
            image.src = imageSrc;

            image.onload = () => {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');

                canvas.width = 250;
                canvas.height = 250;

                ctx.drawImage(
                    image,
                    0,
                    0,
                    canvas.width,
                    canvas.height,
                );

                canvas.toBlob((blob) => {
                    resolve(blob);
                }, 'image/png', 1);
            };
        });
    };

    const showCroppedImage = async () => {
        try {
            // 150x150
            const croppedImage = await getCroppedImg(
                imageSrc,
                croppedAreaPixels,
                rotation
            )
            setCroppedImage(croppedImage);
            // 48x48
            const croppedImage2 = await getCroppedImg(
                imageSrc,
                croppedAreaPixels,
                rotation
            )
            setCroppedImage2(croppedImage2)
        } catch (e) {
            console.error(e)
        }
    };

    const onClose = () => {
        setCroppedImage(null)
    };

    const onFileChange = async (e) => {
        if (e.target.files && e.target.files.length > 0) {
            const file = e.target.files[0]
            let imageDataUrl = await readFile(file)

            try {
                // apply rotation if needed
                const orientation = await getOrientation(file)
                const rotation = ORIENTATION_TO_ANGLE[orientation]
                if (rotation) {
                    imageDataUrl = await getRotatedImage(imageDataUrl, rotation)
                }
            } catch (e) {
                console.warn('failed to detect the orientation')
            }

            setImageSrc(imageDataUrl)
        }
    }

    return (
        <div>
            {imageSrc ? (
                <React.Fragment>
                    <CropContainer>
                        <Cropper
                            image={imageSrc}
                            crop={crop}
                            rotation={rotation}
                            zoom={zoom}
                            aspect={aspect}
                            onCropChange={setCrop}
                            onRotationChange={setRotation}
                            onCropComplete={onCropComplete}
                            onZoomChange={setZoom}
                        />
                    </CropContainer>
                    <ControlsContainer>
                        <div>
                            Zoom:
                            <RangeSlider
                                value={zoom}
                                min={0}
                                max={3}
                                step={0.1}
                                aria-labelledby="Zoom"
                                onChange={(e, zoom) => setZoom(zoom)}
                            />
                        </div>
                        <div>
                            Rotation:
                            <RangeSlider
                                value={rotation}
                                min={0}
                                max={360}
                                step={1}
                                aria-labelledby="Rotation"
                                onChange={(e, rotation) => setRotation(rotation)}
                            />
                        </div>
                    </ControlsContainer>
                    <div>
                        <Button
                            onClick={() => showCroppedImage()}
                            className="btn btn-primary"
                        >
                            Crop, Resize and Show Results
                        </Button>
                        {!!croppedImage && (
                            <Button
                                onClick={() => saveFileUsingAPI()}
                                className="btn btn-success"
                            >
                                Save and Close
                            </Button>
                        )}
                    </div>
                    {!!croppedImage && (
                        <>
                            <hr/>
                            <table>
                                <tr>
                                    <td>250x250</td>
                                    <td>50x50</td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <img src={croppedImage} alt="Cropped" width="250" height="250" />
                                    </td>
                                    <td valign="top">
                                        <img src={croppedImage2} alt="Cropped" width="50" height="50" />
                                    </td>
                                </tr>
                            </table>
                            <hr/>
                        </>
                    )}
                </React.Fragment>
            ) : (
                <input type="file" onChange={onFileChange} accept="image/*" />
            )}
        </div>
    )
};

function readFile(file) {
  return new Promise((resolve) => {
    const reader = new FileReader()
    reader.addEventListener('load', () => resolve(reader.result), false)
    reader.readAsDataURL(file)
  })
}

export default PersonalizationResizeImage;

export const createImage = (url) =>
    new Promise((resolve, reject) => {
        const image = new Image()
        image.addEventListener('load', () => resolve(image))
        image.addEventListener('error', (error) => reject(error))
        image.setAttribute('crossOrigin', 'anonymous') // needed to avoid cross-origin issues on CodeSandbox
        image.src = url
    })

export function getRadianAngle(degreeValue) {
    return (degreeValue * Math.PI) / 180
}

/**
 * Returns the new bounding area of a rotated rectangle.
 */
export function rotateSize(width, height, rotation) {
    const rotRad = getRadianAngle(rotation)

    return {
        width:
            Math.abs(Math.cos(rotRad) * width) + Math.abs(Math.sin(rotRad) * height),
        height:
            Math.abs(Math.sin(rotRad) * width) + Math.abs(Math.cos(rotRad) * height),
    }
}

/**
 * This function was adapted from the one in the ReadMe of https://github.com/DominicTobias/react-image-crop
 */
/**
 * This function was adapted from the one in the ReadMe of https://github.com/DominicTobias/react-image-crop
 */
export async function getCroppedImg(
    imageSrc,
    pixelCrop,
    rotation = 0,
    flip = { horizontal: false, vertical: false }
) {
    const image = await createImage(imageSrc)
    const canvas = document.createElement('canvas')
    const ctx = canvas.getContext('2d')

    if (!ctx) {
        return null
    }

    const rotRad = getRadianAngle(rotation)

    // calculate bounding box of the rotated image
    const { width: bBoxWidth, height: bBoxHeight } = rotateSize(
        image.width,
        image.height,
        rotation
    )

    // set canvas size to match the bounding box
    canvas.width = bBoxWidth
    canvas.height = bBoxHeight

    // translate canvas context to a central location to allow rotating and flipping around the center
    ctx.translate(bBoxWidth / 2, bBoxHeight / 2)
    ctx.rotate(rotRad)
    ctx.scale(flip.horizontal ? -1 : 1, flip.vertical ? -1 : 1)
    ctx.translate(-image.width / 2, -image.height / 2)

    // draw rotated image
    ctx.drawImage(image, 0, 0)

    const croppedCanvas = document.createElement('canvas')

    const croppedCtx = croppedCanvas.getContext('2d')

    if (!croppedCtx) {
        return null
    }

    // Set the size of the cropped canvas
    croppedCanvas.width = pixelCrop.width
    croppedCanvas.height = pixelCrop.height

    // Draw the cropped image onto the new canvas
    croppedCtx.drawImage(
        canvas,
        pixelCrop.x,
        pixelCrop.y,
        pixelCrop.width,
        pixelCrop.height,
        0,
        0,
        pixelCrop.width,
        pixelCrop.height
    )

    // As Base64 string
    // return croppedCanvas.toDataURL('image/jpeg');

    // As a blob
    return new Promise((resolve, reject) => {
        croppedCanvas.toBlob((file) => {
            resolve(URL.createObjectURL(file))
        }, 'image/png')
    })
}

export async function getRotatedImage(imageSrc, rotation = 0) {
    const image = await createImage(imageSrc)
    const canvas = document.createElement('canvas')
    const ctx = canvas.getContext('2d')

    const orientationChanged =
        rotation === 90 || rotation === -90 || rotation === 270 || rotation === -270
    if (orientationChanged) {
        canvas.width = image.height
        canvas.height = image.width
    } else {
        canvas.width = image.width
        canvas.height = image.height
    }

    ctx.translate(canvas.width / 2, canvas.height / 2)
    ctx.rotate((rotation * Math.PI) / 180)
    ctx.drawImage(image, -image.width / 2, -image.height / 2)

    return new Promise((resolve) => {
        canvas.toBlob((file) => {
            resolve(URL.createObjectURL(file))
        }, 'image/png')
    })
}
