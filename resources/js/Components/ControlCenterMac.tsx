const ControlCenterMac = ({ className = '' }: { className?: string }) => {
    return (
        <div className={`flex gap-3 ${className}`}>
            <div className="w-3 h-3 rounded-full cursor-pointer bg-red-700"></div>
            <div className="w-3 h-3 rounded-full cursor-pointer bg-yellow-500"></div>
            <div className="w-3 h-3 rounded-full cursor-pointer bg-green-500"></div>
        </div>
    )
}

export default ControlCenterMac
