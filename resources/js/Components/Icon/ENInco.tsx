export default function ENIcon({
    size = 5,
    className = 'text-current',
    ...props
}: IconProps) {
    return (
        <svg
            width={`${size}em`}
            height={`${size}em`}
            viewBox="0 0 15 9"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            className={className}
        >
            <path
                d="M2.508 1.97982V4.07982H5.328V5.41182H2.508V7.63182H5.688V8.99982H0.828003V0.611816H5.688V1.97982H2.508ZM14.3787 8.99982H12.6987L8.89472 3.25182V8.99982H7.21472V0.611816H8.89472L12.6987 6.37182V0.611816H14.3787V8.99982Z"
                fill="currentColor"
            />
        </svg>
    )
}
